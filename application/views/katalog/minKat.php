<div style="height: 0px">
    <div id="sidebar-1" class="sidebar">
        <table>
            <thead>
                <tr>
                    <td>
                        <h2>Min katalog</h2>
                    </td>
                </tr>
            </thead>
            <tbody id="minKat">
            </tbody>
        </table>
        <ul class="horizontal">
            <li><a href="/katalog/export/katalog/" title="Exportera Din katalog till PDF" class="vtip">Exportera</a></li>
        </ul>
        <table>
            <thead>
                <tr>
                    <td>
                        <h2>
                        	Personliga Samtal
                        	<img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="Här samlas de företag du markerat intresse för." />
                        </h2>
                    </td>
                </tr>
            </thead>
            <tbody id="minPs">
            </tbody>
        </table>
         <ul class="horizontal">
            <li><a href="/katalog/ps/" title="Gå vidare till anmälan" class="vtip">Anmälan</a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var el = $('#sidebar-1'),
        top_offset = 170;
        $(window).scroll(function() {
              var scroll_top = $(window).scrollTop();
              if (scroll_top > top_offset) {
                el.css('top', scroll_top - top_offset);
              }
              else {
                el.css('top', '');
              }
        });
    });
</script>
