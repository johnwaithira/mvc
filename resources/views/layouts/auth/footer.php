<script>



    const password = document.querySelector('input[type=password]')

    function togglePwd()
    {
        $(document).ready(()=>{
            var pwd = $('#password');


            if(pwd.attr('type') === 'password')
            {
                pwd.attr('type', 'text')
            }
            else
            {
                pwd.attr('type', 'password')

            }
        })
    }


</script>