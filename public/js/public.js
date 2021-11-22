document.addEventListener('scroll', function(e) {
    if(window.scrollY == 0){
        document.querySelector("#header").classList.remove('sticky');
    }else{
        document.querySelector("#header").classList.add('sticky');
    }
  });
