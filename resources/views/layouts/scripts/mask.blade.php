<script type="text/javascript">
    $('.birthday').inputmask({
        mask: '99/99/9999'
    });
    $('.phone1').inputmask({
        mask: '(999) 9999.9999'
    });
    $('.phone2').inputmask({
        mask: '(999) 999.999.999'
    });
    $('.zip_code').inputmask({
        mask: '99999-999'
    });

    $('input[type=radio]').click(function(){
        if($(this).prop("id") === "allergy1"){
            $("#allergyDisable").attr('value', '');
        }else if($(this).prop("id") === "skin1"){
            $("#skinDisable").attr('value', '');
        }else if($(this).prop("id") === "hepatitis1"){
            $("#hepatitisDisable").attr('value', '');
        }else if($(this).prop("id") === "epilepsy1"){
            $("#epilepsyDisable").attr('value', '');
        }else if($(this).prop("id") === "dst1"){
            $("#dstDisable").attr('value', '');
        }else if($(this).prop("id") === "cardiac1"){
            $("#cardiacDisable").attr('value', '');
        }else if($(this).prop("id") === "remedy1"){
            $("#remedyDisable").attr('value', '');
        }else if($(this).prop("id") === "drugs1"){
            $("#drugsDisable").attr('value', '');
        }
    });
</script>
