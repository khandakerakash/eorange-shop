
<script>
  //  var info = ;
    var gs =  {!! $gs !!};
    var curr =  {!! $curr !!};

  var isLogedIn =  <?=   Auth::guard('user')->check()==true? "true":"false" ?>;
</script>