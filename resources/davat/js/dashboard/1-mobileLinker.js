(function(){
    // var fallbackLink = 'http://example.com/my-web-app/'+window.location.search+window.location.hash;
    // var isiOS = navigator.userAgent.match('iPad') || navigator.userAgent.match('iPhone') || navigator.userAgent.match('iPod'),
    //     isAndroid = navigator.userAgent.match('Android');
    // if (isiOS || isAndroid) {
    //   document.getElementById('loader').src = 'custom-protocol://my-app'+window.location.search+window.location.hash;
    //   fallbackLink = isAndroid ? 'https://play.google.com/store/apps/details?id=com.mycompany.myapp' :
    //                              'itms-apps://itunes.apple.com/app/my-app/idxxxxxxxx?mt=8' ;
    // }
    // window.setTimeout(function (){ window.location.replace(fallbackLink); }, 1);
    davat.mobileLink = function(){
        var links = $('[data-mobileLink]', this);
        links.addClass('direct')
        links.on('click', function(){
            var mobileUrl = this.href.replace(/^https?/i, location.host == 'risloo.ir' ?'risloo' : 'bisloo') + '#Intent;scheme=risloo;package=com.majazeh.risloo;end';
            var isAndroid = navigator.userAgent.match('Android');
            if(isAndroid){
                window.setTimeout(function (){ window.location.replace(mobileUrl); }, 1);
                return false;
            }
        })
    }
  })();
