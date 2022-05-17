
  <script type="text/javascript">
  var notify = function(msg,err) {
      $.notify({
          // options
          title: '<strong>'+err+'</strong>',
          message: "<br>"+msg,
          icon: 'glyphicon glyphicon-ok',
                    }, {
          // settings
          element: 'body',
          //position: null,
          type: (err=="error")?"danger":"success",
          //allow_dismiss: true,
          //newest_on_top: false,
          showProgressbar: false,
          placement: {
              from: "top",
              align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 3300,
          timer: 1000,
          url_target: '_blank',
          mouse_over: null,
          animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutRight'
          },
          onShow: null,
          onShown: null,
          onClose: null,
          onClosed: null,
          icon_type: 'class',
      });
  }
  @if (count($errors->all()))
  @foreach ($errors->all() as $err)
  console.log("hello");
    notify ('{{$err}}',"error");
  @endforeach
    @endif
      @if (session()->has('message'))
          notify ('Successfull',"success");
      @endif
  </script>
