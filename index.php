<?php

foreach (getUrlTestCases() as $url) {
  echo 'input: ' . $url . PHP_EOL;
  echo 'filter_var: ' . printValidation(filter_var($url, FILTER_VALIDATE_URL)) . PHP_EOL;
  echo 'parse_url: ' . printValidation(parse_url($url, PHP_URL_SCHEME) && parse_url($url, PHP_URL_HOST)) . PHP_EOL;
  echo PHP_EOL . PHP_EOL;
}

function printValidation($validation) {
  return empty($validation) ? 'FAIL' : 'PASS';
}

function getUrlTestCases() {
  // From https://en.wikipedia.org/wiki/Template:URL/testcases:
  return [
    '1964thetribute.com',
    'example.com',
    'ftp://example.com',
    'ftp://www.example.com',
    'http://',
    'http://1964thetribute.com',
    'http://en.m.wikipedia.org/w/index.php?title=User:Codename_Lisa/sandbox&oldid=636147649',
    'http://example.com',
    'http://example.com/foo',
    'http://example.com/foo/bar',
    'http://vvv.some_domain_name.local/some_folder_name/yet.another.foldername/some-other-folder-name/',
    'http://windows.microsoft.com/en-us/windows/turn-off-computer-faq#1TC=windows-vista',
    'http://www.ex=ample.com',
    'http://www.example.com',
    'http://www.example.com#fooBaR',
    'http://www.example.com/',
    'http://www.example.com/#',
    'http://www.example.com/?',
    'http://www.example.com/?1=%2Ex',
    'http://www.example.com/?some+request+with+plus+in+it',
    'http://www.example.com/a/b/c/d/e/f/g/h/i/j/k/l/m/n/o/p/q/r/s/t/u/v/w/x/y/z?1=x',
    'http://www.example.com/foO/BaR',
    'http://www.example.com/foo/bar?a=b&c=d',
    'http://www.example.com:8080/foo/bar',
    'http://www.example.com?foo=BaR',
    'http://www.example1.com and http://www.example2.com/',
    'http://www.hti.umich.edu/cgi/t/text/pageviewer-idx?c=um',
    'http://www.hti.umich.edu/cgi/t/text/pageviewer-idx?c=umhistmath;cc=umhistmath;rgn=full%20text;idno=ABS3153.0001.001;didno=ABS3153.0001.001;view=image;seq=00000140',
    'http://www.hti.umich.edu/cgi/t/text/pageviewer-idx?c=umhistmath;cc=umhistmath;rgn=full+text;idno=ABS3153.0001.001;didno=ABS3153.0001.001;view=image;seq=00000140;some-too-long-query-string-so-that-the-whole-url-is-longer-than-255-characters;some-too-long-query-string-so-that-the-whole-url-is-longer-than-255-characters;some-too-long-query-string-so-that-the-whole-url-is-longer-than-255-characters;some-too-long-query-string-so-that-the-whole-url-is-longer-than-255-characters',
    'http://www.sho.com/site/dexter/home.sho',
    'http://عمان.icom.museum',
    'http:/www.example.com',
    'http:www.example.com',
    'https://example',
    'https://example.com',
    'https://example.com/foo/bar',
    'https://www.ex=ample.com',
    'https://www.EXAMPLE.cOm',
    'https://www.example.com/',
    'www.adobe.com/devnet/pdf/pdf_reference_archive.html',
    'WWW.EXAMPLE.COM',
    'www.example.com/foo/bar',
    'www.example.com/foo/捦挺挎/bar',
    'www.example.com:8080/foo/bar',
    'www.hti.umich.edu/cgi/t/text/pageviewer-idx?c=umhistmath;cc=umhistmath;rgn=full%20text;idno=ABS3153.0001.001;didno=ABS3153.0001.001;view=image;seq=00000140',
    'عمان.icom.museum',
    '', // empty string
  ];
}
