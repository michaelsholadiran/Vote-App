document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.ttr-sidebar-navi');
    OverlayScrollbars(document.querySelectorAll('.ttr-sidebar-wrapper'), {
        scrollbars: {
            visibility: "auto",
            autoHide: "leave",
            autoHideDelay: 100,
            dragScrolling: true,
            clickScrolling: false,
            touchSupport: true,
            snapHandle: false
        }
    });
});