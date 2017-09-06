</div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <!-- <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav> -->
                <!-- <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p> -->
            </div>
        </footer>

    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){

        var flashdata = <?php echo json_encode($this->session->flashdata()) ?>;
        
        if(flashdata && typeof(flashdata) == "object"){
            
            let _input = [];
            if(flashdata.hasOwnProperty("old") && typeof(flashdata.old) == "object" && Object.keys(flashdata.old).length > 0){
                _input = flashdata.old;
            }else if(flashdata.hasOwnProperty("input") && typeof(flashdata.input) == "object"){
                _input = flashdata.input;
            }

            $.each(_input, function(k, v){
                $_element = $('[name="'+ k +'"]');
                if($_element.length > 0){
                    var _tag = $_element.prop("tagName").toLowerCase();

                    if(_tag == "input"){
                        switch($_element.attr("type")){
                            case "text":
                            $_element.val(v);
                            break;

                            case "radio":
                            if($('input[name="'+ k +'"]').closest("label.radio").length > 0){
                                $('input[name="'+ k +'"]').closest("label.radio").removeClass("checked");
                                $('input[name="'+ k +'"][value="'+ v +'"]').prop("checked", true);
                                $('input[name="'+ k +'"][value="'+ v +'"]').closest("label.radio").addClass("checked");
                            }
                            break;
                            case "checkbox":
                            if($('input[name="'+ k +'"]').closest("label.checkbox").length > 0){
                                $('input[name="'+ k +'"]').closest("label.checkbox").removeClass("checked");
                                $('input[name="'+ k +'"]').prop("checked", true);
                                $('input[name="'+ k +'"]').closest("label.checkbox").addClass("checked");
                            }
                            break;
                        }
                    }

                    if(_tag == "textarea"){
                        $_element.html(v);
                    }

                    if(_tag == "select"){
                        $('option', $_element).removeAttr("selected");
                        $_element.val(v);
                    }
                }
            });

            if(flashdata.hasOwnProperty("errors") && typeof(flashdata.errors) == "object"){
                var msg = '';
                $.each(flashdata.errors, function(k, m){
                    msg += k + ' : ' + m + '</br>';
                });
                if(msg.length > 0){
                    $.notify(msg, {type: 'danger', delay: 4000});
                }
            }
            

            if(flashdata.hasOwnProperty("flash") && typeof(flashdata.flash) == "object" && flashdata.flash.hasOwnProperty("msg") && flashdata.flash.hasOwnProperty("type")){
                $.notify(flashdata.flash.msg, {type: flashdata.flash.type, delay: 1000});
            }

        }

    });
</script>
</body>
</html>