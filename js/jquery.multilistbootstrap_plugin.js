(function($) {
    $.fn.extend({
        MultiList: function (objeto) {
            var defaults = {
                showTitle: true,
                title: "MultiLista",
                showAddon: true,
                colorFont: "black",
                backgroundColor: "white",
                data: {}
            },
            objeto = $.fn.extend({}, defaults, objeto),
            $this = $(this),
            $data = objeto.data,
            $contador = 0;
 
            if (objeto.showTitle) {
                $this.before("<h3>"+ objeto.title +"</h3>");
            }
            if ($data.dataRender == undefined) {
                for(var i in $data.dataSource){
                    $this.append("<li>"+ $data.dataSource[i] +"</li>");
                }
            }else{
                var d_drender = {
                    colText: "text",
                    colAddon: "addon"
                }
                var d_drender_o = $.fn.extend({}, d_drender, $data.dataRender),
                    col = d_drender_o.colText,
                    addon = d_drender_o.colAddon;
                for(var i in $data.dataSource){
                    $this.append("<li>"+ $data.dataSource[i][col] + "<span class='badge'> "+ $data.dataSource[i][addon] +"</span></li>");
                }
            }
 
            var $li = $this.children("li");
 
            $li.css("color", objeto.colorFont);
            $li.css("background-color", objeto.backgroundColor);
            $this.addClass("list-group");
            $li.addClass("list-group-item");
 
            $li = $this.children("li");
            $li.click(function () {
                $(this).toggleClass("active");
                if (objeto.showAddon) {
                    $contador = get_selected_items();
                    if($("#multilistPassignAfter").length == 0) {
                        $this.after("<p id='multilistPassignAfter'>"+ $contador +"</p>");
                    }else{
                        $("#multilistPassignAfter").html($contador);
                    }
                }
            });
 
            function get_selected_items() {
                var sum = 0;
                $li.each(function () {
                    if ($(this).hasClass("active")) {
                        sum ++;
                    }
                });
                return sum;
            }
        }
    });
})(jQuery)