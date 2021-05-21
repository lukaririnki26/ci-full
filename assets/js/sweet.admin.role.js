// run jquery when doc is ready
$(function () {
    // set flashsdata from data tag
    const flashdata = $('.flash-data').data('flashdata');
    // set if flashdata has val
    if (flashdata) {
        // run sweetalert
        Swal.fire({
            icon: 'success',
            title: 'Role',
            text: 'Succesfully ' + flashdata
        });
    }
    // bind class from doc
    // add event onclick with param
    $('.badge-del').on('click', function (evt) {
        // disable href
        evt.preventDefault();
        // save val attr href from this
        const href = $(this).attr('href');
        const vam = $(this).data('vam');
        // run sweet alert
        Swal.fire({
            icon: 'warning',
            title: 'Role',
            text: 'Are you sure wanna delete ' + vam + ' ?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
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