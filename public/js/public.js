document.addEventListener('scroll', function(e) {
    if(window.scrollY == 0){
        document.querySelector("#header").classList.remove('r-sticky');
    }else{
        document.querySelector("#header").classList.add('r-sticky');
    }
  });

  document.querySelectorAll('a').forEach(function(item){
      if(item.href.indexOf('/#') < 0) return
      var name = item.href.split('/#')[1];
      if(!name) return
      var goal = document.querySelector('#'+name)
      goal.id = 'navto-'+ name
      item.addEventListener('click', function(e){
          if(goal.offsetTop == window.scrollY) return;
        window.scrollTo(0, goal.offsetTop)
        var shock = document.querySelector('#navity-shock');
        shock.style.display = 'block';
        shock.classList.add('navity-shock');
        setTimeout(function() {
            shock.style.display = '';
        }, 400);
      })
  })
