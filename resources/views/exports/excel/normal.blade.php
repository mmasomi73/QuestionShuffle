<html dir="rtl">
<style>
    tr > td {
        text-align: center;
        border: 0.5px solid #000000;
    }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- Horizontal alignment -->
<tr>
    <?php
    $i = 0;
    ?>
</tr>
<tr>
    <td style="background-color: #d2d2d2;border: 1px solid #0b2e13;">ردیف</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">سوال</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">الف</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">ب</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">ج</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">د</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">جواب</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">سطح</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">فصل</td>
    <td style="background-color: #d2d2d2;border: 1px solid #000;">کتاب</td>
</tr>

@foreach($questions  as $question)

    <tr>
        <td >{{++$i}}</td>
        <td >{{$question->question}}</td>
        <td >{{$question->options->where('option','a')->first()->text}}</td>
        <td >{{$question->options->where('option','b')->first()->text}}</td>
        <td >{{$question->options->where('option','c')->first()->text}}</td>
        <td >{{$question->options->where('option','d')->first()->text}}</td>
        <td >{{getOption($question->answers->first()->option).$question->answers->first()->answer}}</td>
        <td >{{$question->getRate()}}</td>
        <td >{{$question->session->name}}</td>
        <td >{{$question->book->name}}</td>
    </tr>

@endforeach
<tr></tr>

</html>