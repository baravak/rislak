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
        var isAndroid = navigator.userAgent.match('Android');
        links.each(function(){
            var mobileUrl = this.href.replace(/^https?:\/\/[^\/]*\/?/i, location.host == 'risloo.ir' ?'risloo://' : 'bisloo://') + '#Intent;scheme=risloo;package=com.majazeh.risloo;end';
            if(isAndroid){
                this.href = mobileUrl;
            }
        })
    }
  })();
