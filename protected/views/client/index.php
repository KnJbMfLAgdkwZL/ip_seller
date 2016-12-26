<form class="form-horizontal" onsubmit="return false">
    <fieldset>
        <legend>Критерии поиска:</legend>
        <div class="form-group">
            <label for="select" class="col-lg-1 control-label">Поиск по</label>

            <div class="col-lg-4">
                <select class="form-control" id="select">
                    <option>Country</option>
                    <option>State</option>
                    <option>City</option>
                    <option>Zip</option>
                </select>
            </div>
        </div>
        <div class="form-group" id="alert1">
            <label for="inputEmail" class="col-lg-1 control-label">Значение</label>

            <div class="col-lg-4">
                <input class="form-control" id="Searchtext" placeholder="Введите название" type="text"/>

                <p id="alert2" style="margin-top: 1.123456%" class="text-danger hideme">Необходимо больше букв для
                    поиска!</p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-1">
                <button type="button" id="Search" class="btn btn-primary">Поиск</button>
            </div>
        </div>
    </fieldset>
</form>

<div id="SearchResult"></div>

<script>
    $('#Search').click(function ()
    {
        var sel = $('#select option:selected').text();
        var val = $('#Searchtext').val();
        if (val.length >= 2)
        {
            $.ajax({
                url: '?r=client/GetCount',
                data: {
                    sel: sel,
                    val: val
                },
                type: 'POST',
                success: function (msg)
                {
                    $('#SearchResult').html(msg);
                }
            });
        }
        else
        {
            $('#alert1').addClass("has-error");
            $('#alert2').removeClass("hideme");
        }
    });
    $("#Searchtext").change(function ()
    {
        $('#alert1').removeClass("has-error");
        $('#alert2').addClass("hideme");
    });
    $("#Searchtext").focus(function ()
    {
        $('#alert1').removeClass("has-error");
        $('#alert2').addClass("hideme");
    });
</script>
<style>
    .hideme
    {
        display: none;
    }
</style>