# Dev
##ENV Mac

apache 설정 파일 위치 -> /etc/apache2/httpd.conf

웹서버 구동
sudo apachectl -k start;

문법 오류 검사
httpd -t;


##주소체계
http://호스트/컨트롤러/메서드/et
http://localhost/index.php/welcome/index

## 주소에서 index.php제거하기
httpd.conf 파일에서
mod_rewrite.so 모듈 활성화를 위해서 주석을 풀어준다.
CodeIgniter root에 .htaccess파일을 만들어주고 아래와 같이 써준다
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]

그리고

프로잭트를 가리키는 Directory에
AllowOverride None으로 되어 있다면
AllowOverride All로 변경한다.

그럼 URL에서 index.php를 제거할 수 있다.





