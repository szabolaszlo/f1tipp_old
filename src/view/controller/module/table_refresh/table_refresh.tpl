<script>
    function isNeedToRefreshEventTable() {
        var eventId = $('#event-table-event-id').val();
        var numberOfBets = $('#event-table-bet-numbers').val();
        if(eventId !== undefined) {
            $.ajax({
                method: "POST",
                url: '?module=table_refresh/isNeedRefresh&ajax=true',
                data: {eventId: eventId, numberOfBets: numberOfBets}
            }).done(function (data) {
                if (data == 1) {
                    $('#refreshing-able-table').fadeOut('slow', function () {
                        $('#refreshing-able-table').load('?module=table_refresh/getTable&ajax=true', {eventId: eventId}, function () {
                            $('#refreshing-able-table').fadeIn('slow');
                        });
                    });
                }
            });
        }
    }

    $(document).ready(function () {
        setInterval(isNeedToRefreshEventTable, 30000);
    });
</script>