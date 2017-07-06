	function readFFRE(input) {
        var reader = new FileReader();
        reader.onload = function (e){
            $('#imgFFRE') .attr('src', e.target.result) .width(180) .height(180);
        };
        reader.readAsDataURL(input.files[0]);
    }

    function readFPD(input) {        
        var reader = new FileReader();
        reader.onload = function (e){
            $('#imgFPD') .attr('src', e.target.result) .width(180) .height(180);
        };
        reader.readAsDataURL(input.files[0]);       
    }

    function readFPI(input) {        
        var reader = new FileReader();
        reader.onload = function (e){
            $('#imgFPI') .attr('src', e.target.result) .width(180) .height(180);
        };
        reader.readAsDataURL(input.files[0]);       
    }



    function readFCF(input) {        
        var reader = new FileReader();
        reader.onload = function (e){
            $('#imgFCF') .attr('src', e.target.result) .width(180) .height(180);
        };
        reader.readAsDataURL(input.files[0]);       
    }

    function readFCD(input) {        
        var reader = new FileReader();
        reader.onload = function (e){
            $('#imgFCD') .attr('src', e.target.result) .width(180) .height(180);
        };
        reader.readAsDataURL(input.files[0]);       
    }

    function readFCI(input) {        
        var reader = new FileReader();
        reader.onload = function (e){
            $('#imgFCI') .attr('src', e.target.result) .width(180) .height(180);
        };
        reader.readAsDataURL(input.files[0]);       
    }

    function readFCA(input) {        
        var reader = new FileReader();
        reader.onload = function (e){
            $('#imgFCA') .attr('src', e.target.result) .width(180) .height(180);
        };
        reader.readAsDataURL(input.files[0]);       
    }
