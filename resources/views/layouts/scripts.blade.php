 <!-- Scripts -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
 <script src="{{ asset('assets/js/animation.js') }}"></script>
 <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
 <script src="{{ asset('assets/js/custom.js') }}"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
 <script type="text/javascript" src="https://cdn.chatify.com/javascript/loader.js" defer></script>

 <script>
     document.addEventListener("DOMContentLoaded", function() {
         // make it as accordion for smaller screens
         if (window.innerWidth < 992) {

             // close all inner dropdowns when parent is closed
             document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown) {
                 everydropdown.addEventListener('hidden.bs.dropdown', function() {
                     // after dropdown is hidden, then find all submenus
                     this.querySelectorAll('.submenu').forEach(function(everysubmenu) {
                         // hide every submenu as well
                         everysubmenu.style.display = 'none';
                     });
                 })
             });

             document.querySelectorAll('.dropdown-menu a').forEach(function(element) {
                 element.addEventListener('click', function(e) {
                     let nextEl = this.nextElementSibling;
                     if (nextEl && nextEl.classList.contains('submenu')) {
                         // prevent opening link if link needs to open dropdown
                         e.preventDefault();
                         if (nextEl.style.display == 'block') {
                             nextEl.style.display = 'none';
                         } else {
                             nextEl.style.display = 'block';
                         }

                     }
                 });
             })
         }
         // end if innerWidth
     });
     // DOMContentLoaded  end
 </script>
