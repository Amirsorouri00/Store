@extends('layouts.app')
<?php
$name = $kala->name;
$details = $kala->details;
?>

@section('content')

    <div class="container">

        @include('common.errors')

        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Product
                </div>
                <div class="panel-body">
                    <form action="/editkala/{{$kala->id}}" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="details" value="{{$details}}">

                            <div class="row col-md-12">

                                <label class="col-md-2 control-label">Product Name</label>
                                <!--<div  class="unselectable col-md-10">
                                    <p contenteditable="true" class="col-md-9 form-control cont" style="width:100%;  height:100%;">

                                    </p>
                                </div>-->
                                <div class="col-md-10">
                                    <input  class="input-md form-control" name="name" value="{{$name}}">
                                </div>
                            </div>

                            <div class="row col-md-offset-2 col-md-3 form-group">
                                <label class="control-label col-md-4">Font-family</label>
                                <select id="font" class="col-md-4 form-control">
                                    <option value="Arial">Arial</option>
                                    <option value="Amazon">Amazon</option>
                                </select>
                                <button type="button" onclick="alaki();" id="btn" class="form-group btn btn-info col-md-6">
                                    Change Font
                                </button>
                            </div>

                            <div class="row col-md-offset-1 col-md-1">
                                <button type="button" class="btn-link form-control" onclick="bold()" style="font-size: x-large; color: #880000">
                                    Bold
                                </button>
                            </div>

                            <div class="row col-md-offset-2 col-md-3 form-group">
                                <label id="size" class="control-label col-md-4">Font-color</label>
                                <select id="color" class="col-md-8 form-control">
                                    <option value="black">Black</option>
                                    <option value="blue">Blue</option>
                                    <option value="red">Red</option>
                                </select>
                                <button type="button" onclick="size();" id="btn" class="form-group btn btn-info col-md-7">
                                    Change Font-color
                                </button>
                            </div>

                            <div  class="row col-md-12">
                                <label  class="col-md-2 control-label">Product Description</label>
                                <div class="unselectable col-md-10">
                                    <p class="col-md-9 form-control conttext" contenteditable="true" style="width:100%;  height:100%;">

                                        {!! $details !!}

                                    </p>
                                </div>
                            </div>

                            <button class="btn btn-info col-md-offset-11">
                                Submit
                            </button>

                        <div ><input type="hidden" id="id1" class="input-lg col-md-12" value=""></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        /* $("#btn").click(function foo() {
         var selObj = window.getSelection();
         //alert(selObj);
         var selRange = selObj.getRangeAt(0);
         // do stuff with the range
         var text = selObj.toString();
         alert(text);
         });*/

        function size(){
            //var font = $('document').getElementById('#size');
            var size = $('select[id="color"]').val();
            //var size = 'hello';
            $('#id1').attr('value', size);
            var highlight = window.getSelection();
            var spn;
            if(size == 'blue'){
                spn = '<a style="color: blue">' + highlight + '</a>';
            }
            else if(size == 'black'){
                spn = '<a style="color: black">' + highlight + '</a>';
            }
            else{
                spn = '<a style="color: red">' + highlight + '</a>';
            }

            var     text = '<?php echo $details; ?>',
                    range = highlight.getRangeAt(0),
                    startText = text.substring(0, range.startOffset),
                    endText = text.substring(range.endOffset, text.length);
            var newtext = startText + spn + endText;
            $('.conttext').html(startText + spn + endText);
            //$('#id1').value("hello");
            //$('#id1').attr('value', '<?php echo $details; ?>');
            $('input[name="details"]').attr('value',newtext);
            $.post(window.location, {details: newtext});
        }


        function bold(){
            var highlight = window.getSelection(),
                    spn = '<a class="highlight" style="font-weight: bold">' + highlight + '</a>',
                    text = '<?php echo $details; ?>',
                    range = highlight.getRangeAt(0),
                    startText = text.substring(0, range.startOffset),
                    endText = text.substring(range.endOffset, text.length);
            var newtext = startText + spn + endText;
            $('.conttext').html(startText + spn + endText);
            //$('#id1').value("hello");
            $('#id1').attr('value', '<?php echo $details; ?>');
            $('input[name="details"]').attr('value',newtext);
            $.post(window.location, {details: newtext});
        }

        function alaki(){
            //var highlight = window.getSelection(),
            var size = $('select[id="font"]').val();
            //var size = 'hello';
            $('#id1').attr('value', size);
            var highlight = window.getSelection();
            var spn;
            if(size == 'Arial'){
                spn = '<a class="highlight" style="font-family: Arial">' + highlight + '</a>';
            }
            else if(size == 'Amazon'){
                spn = '<a class="highlight" style="font-family: Amazon">' + highlight + '</a>';
            }
            var     text = '<?php echo $details; ?>',
                    range = highlight.getRangeAt(0),
                    startText = text.substring(0, range.startOffset),
                    endText = text.substring(range.endOffset, text.length);
            var newtext = startText + spn + endText;
            $('.conttext').html(startText + spn + endText);
            //$('#id1').value("hello");
            $('#id1').attr('value', '<?php echo $details; ?>');
            $('input[name="details"]').attr('value',newtext);
            $.post(window.location, {details: newtext});

        }




        $('#btn').click(function(){
            var highlight = window.getSelection(),
                    spn = '<a class="highlight" style="font-family: Amazon">' + highlight + '</a>',
                    text = $('.conttext').text(),
                    range = highlight.getRangeAt(0),
                    startText = text.substring(0, range.startOffset),
                    endText = text.substring(range.endOffset, text.length);
            var newtext = startText + spn + endText;
            $('.conttext').html(startText + spn + endText);
            $('#id1').value("hello");
            // $('#id1').attr('value', newtext.toString());
        });
    </script>

@endsection
