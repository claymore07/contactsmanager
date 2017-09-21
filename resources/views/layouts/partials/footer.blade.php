<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{asset('js/libs.js')}}"></script>
<script src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>

<script>
    $(function () {
        $("#autocomplete").autocomplete({
            source: "{{route('contacts.autoComplete')}}",
            minLength: 1,
            select: function (event, ui) {

                $(this).val(ui.item.value+' '+ui.item.lname);
                return false;
            },
            html: true,
            // optional (if other layers overlap autocomplete list)
            open: function (event, ui) {
                $(".ui-autocomplete").css("z-index", 1000).css("top", 50);

            }

        }).data( "ui-autocomplete" )._renderItem = function(ul, item){
            //code to do cool stuff
            return $("<li></li>").data("item.autocomplete",     item)
                .append("<div>" +item.value+' '+ item.lname + "    </div>").appendTo(
                    ul);
        };
    });
</script>

@yield('footer')
</body>
</html>