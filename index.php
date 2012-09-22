<?php

  if(get('/')){
    render('root');

  }elseif(get('/somepage')){
    render('somepage');

  }elseif(get('/somepage/:someparam')){
    render('somepage');

  }

?>
