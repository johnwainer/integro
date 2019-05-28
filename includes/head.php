<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
<link rel="stylesheet" href="app-assets/css/custom.css">  
<script type="text/javascript">
    function validate_login() {
        if(localStorage.getItem('integro_id') != undefined && localStorage.getItem('integro_name') != "" && localStorage.getItem('integro_nick') != ""){
          
            //console.log(localStorage);
        }else{
            localStorage.clear();
            window.location.href = './';
        }
    }
      window.onload = validate_login;
</script>