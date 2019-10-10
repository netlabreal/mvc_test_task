<section main>
    <div class="container">
        <h1>Список задач</h1>
        <p>
        <table id="example" class="display" width="100%" style="cursor: pointer"></table>

        <button type="button" class="btn btn-default" id="add_button">Добавить</button>
        <?php
        if (isset($_SESSION['USERNAME'])) {
            echo '<button type="button" class="btn btn-primary" id="edit_button">Редактировать</button>';
        }
        ?>





        </p>
    </div>
</section>





<script>
    let ar =[];

    ar = <?php echo json_encode($data); ?>;
    var dataSet = ar.map((name)=>{
        let y = name.status == 0? '':'выполнено';
        let h = name.edit == 0 ? '': 'отредактировано администратором';
        return [name.id, name.name, name.email, name.task, y, h];
    });

    $(document).ready(function() {

        $('#edit_button').prop('disabled', true);

        var table = $('#example').DataTable( {
            dom: "Bfrtip",
            data: dataSet,
            pageLength: 3,
            select: true,

            columns: [
                { title: "id" },
                { title: "имя пользователя" },
                { title: "email" },
                { title: "текст задачи" },
                { title: "статус" },
                { title: "состояние" },

            ]
        } );

        table.on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
                $('#edit_button').prop('disabled', true);
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#edit_button').prop('disabled', false);
            }
        } );


        $('#edit_button').click(function () {
            window.location.href = '/task/edit/'+table.$('tr.selected').find("td")[0].innerHTML;
        });
        $('#add_button').click(function () {
            window.location.href = '/task/add';
        });
    } );


</script>

