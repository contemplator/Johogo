=begin
功能: 用 Ruby 玩 ptt (2) 教學範例
作者: http://godspeedlee.myweb.hinet.net/
聲明: 僅供個人研究使用，請勿用於非法用途，本人不對此程式造成的任何損壞負責
=end


require 'net/telnet' 

AnsiSetDisplayAttr = '\x1B\[(?>(?>(?>\d+;)*\d+)?)m'
WaitForInput =  '(?>\s+)(?>\x08+)'
AnsiEraseEOL = '\x1B\[K'
AnsiCursorHome = '\x1B\[(?>(?>\d+;\d+)?)H'
PressAnyKey = '\xAB\xF6\xA5\xF4\xB7\x4E\xC1\xE4\xC4\x7E\xC4\xF2'
Big5Code = '[\xA1-\xF9][\x40-\xF0]'
PressAnyKeyToContinue = "#{PressAnyKey}(?>\\s*)#{AnsiSetDisplayAttr}(?>(?:\\xA2\\x65)+)\s*#{AnsiSetDisplayAttr}"
PressAnyKeyToContinue2 = "\\[#{PressAnyKey}\\](?>\\s*)#{AnsiSetDisplayAttr}"
# (b)進板畫面
ArticleList = '\(b\)' + "#{AnsiSetDisplayAttr}" + '\xB6\x69\xAA\x4F\xB5\x65\xAD\xB1\s*' + "#{AnsiSetDisplayAttr}#{AnsiCursorHome}"
Signature = '\xC3\xB1\xA6\x57\xC0\xC9\.(?>\d+).+' + "#{AnsiCursorHome}"
EmailBox = '[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}'

=begin
功能:連接 ptt
參數:
		port	: port number(通常是23，也可以使用443,3000等，視 ptt 官方公佈而定)
		time_out	: connect/read time-out
		wait_time: http://www.ensta.fr/~diam/ruby/online/ruby-doc-stdlib/libdoc/net/telnet/rdoc/index.html
=end
def ptt_connect(port, time_out=3, wait_time=1)
	raise ArgumentError, "ptt_connect invalid arg 0:" unless port.kind_of? Integer
	raise ArgumentError, "ptt_connect() invalid arg 1:" unless time_out.kind_of? Integer
	raise ArgumentError, "ptt_connect() invalid arg 2:" unless wait_time.kind_of? Integer 
    begin
        tn = Net::Telnet.new('Host'       => "ptt.cc",
                             'Port'       => port,
                             'Timeout'    => time_out,
                             'Waittime'   => wait_time
                            )
    
    
    rescue SystemCallError => e
        raise e, "ptt_connect() system call:" + e.to_s()
    rescue TimeoutError => e
        raise e, "ptt_connect() timeout:" + e.to_s()
    rescue SocketError => e        
        raise e, "ptt_connect() socket:" + e.to_s()
    rescue Exception => e
        raise e, "ptt_connect() unknown:" + e.to_s()
    end
    return tn
end                    


=begin
功能: 登入 ptt
參數:
		tn		: Net::Telnet
		id		: 帳號
		password: 密碼
=end
def ptt_login(tn, id, password)
    raise ArgumentError, "ptt_login() invalid telnet reference:" unless tn.kind_of? Net::Telnet
    raise ArgumentError, "ptt_login() invalid id:" unless id.kind_of? String
    raise ArgumentError, "ptt_login() invalid password:" unless password.kind_of? String                    
    
    begin
		tn.waitfor(/guest.+new(?>[^:]+):(?>\s*)#{AnsiSetDisplayAttr}#{WaitForInput}\Z/){ |s| print(s) }				
		# 帳號
		tn.cmd("String" => id, "Match" => /\xB1\x4B\xBD\x58:(?>\s*)\Z/){ |s| print(s) }		
		# 密碼, 按任意鍵繼續		 		
		tn.cmd("String" => password, 
			   "Match" => /#{PressAnyKeyToContinue}\Z/){ |s| print(s) }
		tn.print("\n")
	rescue SystemCallError => e
        raise e, "ptt_login() system call:" + e.to_s()
    rescue TimeoutError => e
        raise e, "ptt_login() timeout:" + e.to_s()
    rescue SocketError => e        
        raise e, "ptt_login() socket:" + e.to_s()    
    rescue Exception => e
        raise e, "ptt_login() unknown:" + e.to_s()			
	end
end


=begin
功能: 貼文(Ctrl+P)
參數:
	 tn 		: Net::Telnet
	 title 		: 標題
	 article 	: 文章內容
	 sign_num 	: 簽名檔編號(預設不選)
	 kind		: 標題種類(預設不選)	 
=end
def ptt_post(tn, title, article, sign_num=0, kind=nil)
	raise ArgumentError, "ptt_post() invalid telnet reference:" unless tn.kind_of? Net::Telnet
    raise ArgumentError, "ptt_post() invalid title:" unless title.kind_of? String    
    raise ArgumentError, "ptt_post() invalid article:" unless article.kind_of? String
    unless (sign_num.kind_of? Integer and sign_num <= 9 and sign_num >= 0) or (sign_num.kind_of? String and sign_num == "x")
    	raise ArgumentError, "ptt_post() invalid sign_num:" 
	end
    raise ArgumentError, "ptt_post() invalid kind" unless kind == nil or kind.kind_of? Integer
    begin
    	tn.print("\x10") # ctrl+p
    	# 種類
    	tn.waitfor(/\((?>\d+)-(?>\d+)(?>(?:#{Big5Code})+)\).*#{AnsiCursorHome}\Z/m){ |s| print(s) }		
    		
    	# 標題:
    	tn.cmd( "String" => kind != nil ? "%d" % kind : "",
    			"Match" => /\xBC\xD0\xC3\x44\xA1\x47.*#{AnsiCursorHome}\Z/){ |s| print(s) }    	
    				
    	# 編輯文章
    	tn.cmd( "String" => title,
    			"Match" => /1\s*:\s*1\s*#{AnsiSetDisplayAttr}#{AnsiCursorHome}\Z/){ |s| print(s) }
    	tn.print(article)
    	tn.waitfor(/#{AnsiCursorHome}#{AnsiSetDisplayAttr}(?>\d+)(?>(?:\s*:\s*\d+)?)#{AnsiSetDisplayAttr}#{AnsiCursorHome}\Z/){ |s| print(s) }
    		
    	# ctrl+x
    	tn.print("\x18")
    	tn.waitfor(/(?>(?:#{AnsiEraseEOL}\r?\n)+)(?>(?:#{AnsiEraseEOL})?)#{AnsiCursorHome}\Z/){ |s| print(s) }    	
    		
    	# 存檔    	
    	lines = tn.cmd( "String" => "s", "Match" => /(?:#{PressAnyKeyToContinue}|#{Signature})\Z/m) do |s|    		
    		print(s)
    	end   
    	
    	# 假如沒有簽名檔就離開 	
    	if not (/#{Signature}\Z/m =~ lines)
    		tn.print("\n")
			return
    	end    	
    	# 選擇簽名檔
    	tn.cmd( "String" => (sign_num.kind_of? Integer) ? "%d" % sign_num : sign_num,    	
    		   "Match" => /#{PressAnyKeyToContinue}\Z/ ) do |s|
    		print(s)		
    	end
    	
    	tn.print("\n")    	
    		
    rescue SystemCallError => e
        raise e, "ptt_post() system call:" + e.to_s()
    rescue TimeoutError => e
        raise e, "ptt_post() timeout:" + e.to_s()
    rescue SocketError => e        
        raise e, "ptt_post() socket:" + e.to_s()    
    rescue Exception => e
        raise e, "ptt_post() unknown:" + e.to_s()			
	end    
end


=begin
功能: 進入某板(等於從主畫面按's')
參數:
		tn			: Net::Telnet
		board_name	: 板名
傳回值: 文章列表				
=end
def ptt_board(tn, board_name)
	raise ArgumentError, "ptt_board() invalid telnet reference:" unless tn.kind_of? Net::Telnet
    raise ArgumentError, "ptt_board() invalid id:" unless board_name.kind_of? String
    
	begin
		# [呼叫器]
		tn.waitfor(/\[\xA9\x49\xA5\x73\xBE\xB9\]#{AnsiSetDisplayAttr}.+#{AnsiCursorHome}\Z/){ |s| print(s) }		
		tn.print('s')
		tn.waitfor(/\):(?>\s*)#{AnsiSetDisplayAttr}(?>\s*)#{AnsiSetDisplayAttr}#{AnsiCursorHome}\Z/){ |s| print(s) }		
		
		lines = tn.cmd( "String" => board_name, "Match" => /(?>#{PressAnyKeyToContinue}|#{ArticleList})\Z/ ) do |s| 			
			print(s)
		end		
		
		# 按任意鍵繼續
		if not (/#{PressAnyKeyToContinue}\Z/ =~ lines)
			return lines
		end		
		
		
		lines = tn.cmd("String" => "", "Match" => /#{ArticleList}\Z/) do |s|			
			print(s)
		end			
		return lines

	rescue SystemCallError => e
        raise e, "ptt_login() system call:" + e.to_s()
    rescue TimeoutError => e
        raise e, "ptt_login() timeout:" + e.to_s()
    rescue SocketError => e        
        raise e, "ptt_login() socket:" + e.to_s()    
    rescue Exception => e
        raise e, "ptt_login() unknown:" + e.to_s()			
	end    
end


=begin
功能: 傳回文章的作者列表
	  例:
	      [["123", "apple"], ["124", "banana"]...]
參數:
		s: 去掉 ANSI 控制碼的字串		
傳回值: 文章列表				
=end
def search_by_title(tn, title)
	raise ArgumentError, "search_by_title() invalid telnet reference:" unless tn.kind_of? Net::Telnet
	raise ArgumentError, "search_by_title() invalid title:" unless title.kind_of? String
	begin
		tn.print('?')
		tn.waitfor(/\xB7\x6A\xB4\x4D\xBC\xD0\xC3\x44:\s*#{AnsiCursorHome}#{AnsiSetDisplayAttr}\s+#{AnsiSetDisplayAttr}#{AnsiEraseEOL}#{AnsiCursorHome}\Z/){ |s| print(s) }
		result = tn.cmd( 'String' => title, 'Match' => /#{ArticleList}/){ |s| print(s) }
		return result			
	rescue SystemCallError => e
	    raise e, "ptt_login() system call:" + e.to_s()
	rescue TimeoutError => e
	    raise e, "ptt_login() timeout:" + e.to_s()
	rescue SocketError => e        
	    raise e, "ptt_login() socket:" + e.to_s()    
	rescue Exception => e
	    raise e, "ptt_login() unknown:" + e.to_s()			
	end	
end


def gsub_ansi_by_space(s)
	raise ArgumentError, "search_by_title() invalid title:" unless s.kind_of? String
	
	s.gsub!(/\x1B\[(?:(?>(?>(?>\d+;)*\d+)?)m|(?>(?>\d+;\d+)?)H|K)/) do |m|
		if m[m.size-1].chr == 'K'
			"\n"
		else
			" "
		end
	end
end	



def get_article_author_list(s)
	raise ArgumentError, "get_article_author_list() invalid title:" unless s.kind_of? String
	list = []
	s.scan(/\s(\d+)(?>\s+)								
		   # m or M or s or S or !
		   (?>(?:[~+mMsS!](?=\s))?)						
		   # 推或噓
		   (?>(?>\s*(?>\xC3\x7A|XX|X\d|\d+)(?=\s))?)	
		   # 日期
		   (?>(?>\s*(?>\d+\/)?\d+(?=\s))?)				
		   # 帳號
		   (?>\s*)(?!(?>\d+\s))(\w{2,})\s+/x){ 		
		|num, author|	list.push([num, author]) # 儲存文章編號與作者帳號
	}
	return list
end


def goto_by_article_num(tn, num)
	raise ArgumentError, "goto_by_article_num() invalid telnet reference:" unless tn.kind_of? Net::Telnet	
	raise ArgumentError, "goto_by_article_num() invalid num:" unless num.kind_of? Integer or num.kind_of? String
	tn.cmd("String" => (num.kind_of?(Integer) ? num.to_s : num), "Match" => /#{AnsiEraseEOL}#{AnsiCursorHome}\Z/){ |s| print(s) }
end


# 寄到某個信箱
def email_article(tn, email_box=nil)
	raise ArgumentError, "email_article() invalid telnet reference:" unless tn.kind_of? Net::Telnet
	if email_box != nil && ( !(email_box.kind_of? String) || !(/^#{EmailBox}$/ =~ email_box) )
		raise ArgumentError, "email_article() invalid email_box:"
	end
	begin
		tn.print("F")
		# ...[xxx@yyy.zzz] 嗎(Y/N/Q)？
		ptt_output = tn.waitfor(/\[#{EmailBox}\]\s+\xB6\xDC\(Y\/N\/Q\)\xA1\x48\[Y\]\s*#{AnsiSetDisplayAttr}\s+#{AnsiSetDisplayAttr}\x08+\Z/){ |s| print(s) }
		email_box_current = ptt_output[/\b#{EmailBox}\b/]
		if email_box == nil	|| email_box == email_box_current			
			result = tn.cmd("String" => "", "Match" => /(?>#{PressAnyKeyToContinue2}|#{ArticleList})\Z/){ |s| print(s) }
			if not (/#{PressAnyKeyToContinue2}\Z/ =~ result)
				return true # 轉寄成功!
			end
			tn.cmd("String" => "", "Match" => /#{ArticleList}\Z/) do |s|
				print(s)
			end
			return false # 轉寄失敗!
		end
		
		# 請輸入轉寄地址：
		tn.cmd("String" => "n", 
			   "Match" => /\xC2\xE0\xB1\x48\xA6\x61\xA7\x7D\xA1\x47
			              #{AnsiSetDisplayAttr}
			              \s+
			              #{AnsiCursorHome}n
			              #{AnsiSetDisplayAttr}
			              #{AnsiCursorHome}\Z/x
		      ){ |s| print(s) }

		# xxx@yyy.zzz		      	
		result = tn.cmd("String" => email_box,
			   			"Match" => /(?>#{PressAnyKeyToContinue2}|#{ArticleList})\Z/
			  		   ){ |s| print(s) }

		if not (/#{PressAnyKeyToContinue2}\Z/ =~ result)
			return true # 轉寄成功!
		end
		
		tn.cmd("String" => "", "Match" => /#{ArticleList}\Z/) do |s|
			print(s)
		end			  								  	
		return false # 轉寄失敗!
	rescue SystemCallError => e
	    raise e, "email_article() system call:" + e.to_s()
	rescue TimeoutError => e
	    raise e, "email_article() timeout:" + e.to_s()
	rescue SocketError => e        
	    raise e, "email_article() socket:" + e.to_s()    
	rescue Exception => e
	    raise e, "email_article() unknown:" + e.to_s()			
	end			
end


if ARGV.size != 3 then
	print("play-ptt2.rb ID PASSWORD E-MAIL_BOX\n")
	exit
end

if not (/#{EmailBox}/ =~ ARGV[2]) 
	print("invalid e-mail box!\n")
end


begin			
	system('cls')
    tn = ptt_connect(23)    	    
    system('cls')
    ptt_login(tn, ARGV[0], ARGV[1])
    system('cls')
    # 進入O2
	ptt_board(tn, 'AllTogether')	
	system("cls")	
	# 搜尋標題:
	result = search_by_title(tn, '[徵男]')	
	gsub_ansi_by_space(result)	
	authors = get_article_author_list(result)	
	# 只取最新 10 筆
	authors.reverse!
	if authors.size > 10
		authors.slice!(10, authors.size - 10)
	end
	system('cls')
	# 將最新10筆徵友文寄回信箱
	authors.each do |a|		
		goto_by_article_num(tn, a[0])
		if !email_article(tn, ARGV[2])
			puts("\nsend article #{a[0]} fail!")
		end
	end
rescue Exception => err
    puts(err.to_s())
	err.backtrace.each{ |s| puts(s) }
end


