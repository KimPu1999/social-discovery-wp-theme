(function(){'use strict';
  var body=document.body, toggle=document.querySelector('.sd-menu-toggle'), drawer=document.getElementById('sd-mobile-drawer');
  if(toggle&&drawer){toggle.addEventListener('click',function(){var open=drawer.classList.toggle('is-open');toggle.setAttribute('aria-expanded',String(open));});}
  var mode=body.getAttribute('data-theme-mode')||'system';
  if(mode==='dark'||(mode==='system'&&window.matchMedia&&window.matchMedia('(prefers-color-scheme: dark)').matches)){body.setAttribute('data-theme','dark');}
  if(mode==='system'&&window.matchMedia){window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change',function(e){body.setAttribute('data-theme',e.matches?'dark':'light');});}
})();
