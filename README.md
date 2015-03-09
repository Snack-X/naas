# NaaS - Nixie-tube As A Service

[Click here.](http://naas.snack.so/)

## For nginx

Add below to your `location /` block:

    rewrite ^/([a-d])/(.*)\.(png|jpg)$ /image.php?type=$1&text=$2&format=$3;

## LICENSE

Nixie tube images are from [Čestmír Hýbl](http://cestmir.freeside.sk/projects/dhtml-nixie-display/). Do not use it commercial.

Source code itself is under WTFPL. It's OK to use it commercial if you don't use Čestmír Hýbl's nixie tube images.

'''
        DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
                    Version 2, December 2004 

 Copyright (C) 2004 Sam Hocevar <sam@hocevar.net> 

 Everyone is permitted to copy and distribute verbatim or modified 
 copies of this license document, and changing it is allowed as long 
 as the name is changed. 

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE 
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION 

  0. You just DO WHAT THE FUCK YOU WANT TO.
'''

