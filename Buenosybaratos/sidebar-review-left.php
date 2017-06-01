<div class="left-links">
    <h2 class="bg blue">Contenido</h2>

    <?php
    if (is_active_sidebar('toc')):
        dynamic_sidebar('toc');
    else:
        echo '<ul><li>Please activate table of content plugin.<br> After drag the toc+ <br> to table of content widget</li></ul>';
    endif;
    ?>
    <!--ul>
        <li><a href="#table-compare"><span><i class="fa fa-caret-right" aria-hidden="true"></i></span> Tabla comparativa</a></li>
        <li><a href="#guia-compare"><span><i class="fa fa-caret-right" aria-hidden="true"></i></span> Guia de compra</a></li>
        <li><a href="#product-recomend"><span><i class="fa fa-caret-right" aria-hidden="true"></i></span> Productos Recomendados</a></li>
        <li><a href="#dyson-air"><span><i class="fa fa-caret-right" aria-hidden="true"></i></span> Dyson Air Multiplier AM09</a></li>
        <li><a href="#rowenta-turbo"><span><i class="fa fa-caret-right" aria-hidden="true"></i></span> Rowenta Turbo Silence Protect</a></li>
        <li><a href="#honeywell"><span><i class="fa fa-caret-right" aria-hidden="true"></i></span> Honeywell HT-900E </a></li>
    </ul-->
</div>