// run jquery when doc is ready
$(function () {
    $('.signout').on('click', function (evt) {
        // disable href
        evt.preventDefault();
        // save val attr href from this
        const href = $(this).attr('href');
        // run sweet alert
        Swal.fire({
            icon: 'warning',
            title: 'Logout',
            text: 'Are you sure wanna logout?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            // catch btn as result
            // check if result value true 
            if (result.value) {
                // anchor doc to href
                document.location.href = href;
                // end if
            }
            // end then
        });
        // end bind
    });
    // end jquery function doc ready
});