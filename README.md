## Test simple URL validation techniques in PHP

This repo was created to check info provided in [Validate URL with UTF-8 symbols in PHP](https://medium.com/terales-engineering/validate-url-with-utf-8-symbols-in-php-e3b0434c96bf).

### When you need to verify that user give you a valid website address:

```php
<?php
// common option
filter_var($url, FILTER_VALIDATE_URL); // don't support utf-8 chars

// suggested option
parse_url($url, PHP_URL_SCHEME) && parse_url($url, PHP_URL_HOST);
```

### Here are test results:

```
# php ./index.php

input: 1964thetribute.com
filter_var: FAIL
parse_url: FAIL


input: example.com
filter_var: FAIL
parse_url: FAIL


input: ftp://example.com
filter_var: PASS
parse_url: PASS


input: ftp://www.example.com
filter_var: PASS
parse_url: PASS


input: http://
filter_var: FAIL
parse_url: FAIL


input: http://1964thetribute.com
filter_var: PASS
parse_url: PASS


input: http://en.m.wikipedia.org/w/index.php?title=User:Codename_Lisa/sandbox&oldid=636147649
filter_var: PASS
parse_url: PASS


input: http://example.com
filter_var: PASS
parse_url: PASS


input: http://example.com/foo
filter_var: PASS
parse_url: PASS


input: http://example.com/foo/bar
filter_var: PASS
parse_url: PASS


input: http://vvv.some_domain_name.local/some_folder_name/yet.another.foldername/some-other-folder-name/
filter_var: FAIL
parse_url: PASS


input: http://windows.microsoft.com/en-us/windows/turn-off-computer-faq#1TC=windows-vista
filter_var: PASS
parse_url: PASS


input: http://www.ex=ample.com
filter_var: FAIL
parse_url: PASS


input: http://www.example.com
filter_var: PASS
parse_url: PASS


input: http://www.example.com#fooBaR
filter_var: PASS
parse_url: PASS


input: http://www.example.com/
filter_var: PASS
parse_url: PASS


input: http://www.example.com/#
filter_var: PASS
parse_url: PASS


input: http://www.example.com/?
filter_var: PASS
parse_url: PASS


input: http://www.example.com/?1=%2Ex
filter_var: PASS
parse_url: PASS


input: http://www.example.com/?some+request+with+plus+in+it
filter_var: PASS
parse_url: PASS


input: http://www.example.com/a/b/c/d/e/f/g/h/i/j/k/l/m/n/o/p/q/r/s/t/u/v/w/x/y/z?1=x
filter_var: PASS
parse_url: PASS


input: http://www.example.com/foO/BaR
filter_var: PASS
parse_url: PASS


input: http://www.example.com/foo/bar?a=b&c=d
filter_var: PASS
parse_url: PASS


input: http://www.example.com:8080/foo/bar
filter_var: PASS
parse_url: PASS


input: http://www.example.com?foo=BaR
filter_var: PASS
parse_url: PASS


input: http://www.example1.com and http://www.example2.com/
filter_var: FAIL
parse_url: PASS


input: http://www.hti.umich.edu/cgi/t/text/pageviewer-idx?c=um
filter_var: PASS
parse_url: PASS


input: http://www.hti.umich.edu/cgi/t/text/pageviewer-idx?c=umhistmath;cc=umhistmath;rgn=full%20text;idno=ABS3153.0001.001;didno=ABS3153.0001.001;view=image;seq=00000140
filter_var: PASS
parse_url: PASS


input: http://www.hti.umich.edu/cgi/t/text/pageviewer-idx?c=umhistmath;cc=umhistmath;rgn=full+text;idno=ABS3153.0001.001;didno=ABS3153.0001.001;view=image;seq=00000140;some-too-long-query-string-so-that-the-whole-url-is-longer-than-255-characters;some-too-long-query-string-so-that-the-whole-url-is-longer-than-255-characters;some-too-long-query-string-so-that-the-whole-url-is-longer-than-255-characters;some-too-long-query-string-so-that-the-whole-url-is-longer-than-255-characters
filter_var: PASS
parse_url: PASS


input: http://www.sho.com/site/dexter/home.sho
filter_var: PASS
parse_url: PASS


input: http://عمان.icom.museum
filter_var: FAIL
parse_url: PASS


input: http:/www.example.com
filter_var: FAIL
parse_url: FAIL


input: http:www.example.com
filter_var: FAIL
parse_url: FAIL


input: https://example
filter_var: PASS
parse_url: PASS


input: https://example.com
filter_var: PASS
parse_url: PASS


input: https://example.com/foo/bar
filter_var: PASS
parse_url: PASS


input: https://www.ex=ample.com
filter_var: FAIL
parse_url: PASS


input: https://www.EXAMPLE.cOm
filter_var: PASS
parse_url: PASS


input: https://www.example.com/
filter_var: PASS
parse_url: PASS


input: www.adobe.com/devnet/pdf/pdf_reference_archive.html
filter_var: FAIL
parse_url: FAIL


input: WWW.EXAMPLE.COM
filter_var: FAIL
parse_url: FAIL


input: www.example.com/foo/bar
filter_var: FAIL
parse_url: FAIL


input: www.example.com/foo/捦挺挎/bar
filter_var: FAIL
parse_url: FAIL


input: www.example.com:8080/foo/bar
filter_var: FAIL
parse_url: FAIL


input: www.hti.umich.edu/cgi/t/text/pageviewer-idx?c=umhistmath;cc=umhistmath;rgn=full%20text;idno=ABS3153.0001.001;didno=ABS3153.0001.001;view=image;seq=00000140
filter_var: FAIL
parse_url: FAIL


input: عمان.icom.museum
filter_var: FAIL
parse_url: FAIL


input: // empty string
filter_var: FAIL
parse_url: FAIL
```
