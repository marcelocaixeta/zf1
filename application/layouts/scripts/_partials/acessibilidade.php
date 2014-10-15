<div id="acessibilidade">
    <div id="caminho">
        <!-- <a href="#">caminho</a><a href="#">caminho 2</a><a href="#">caminho 3</a><a href="#">caminho 4</a>-->
        <?php echo $this->navigation()->breadcrumbs()->setLinkLast(false)->setMinDepth(0)->setSeparator('<span> &#8227; </span>')->render(); ?>
    </div>
    <div id="fonte">
        <a href="#" id="diminui" title="diminuir tamanho da letra">A-</a>
        <a href="#" id="normal" title="letra tamanho normal">A</a>
        <a href="#" id="aumenta" title="aumentar tamanho da letra">A+</a>
        <a href="#" id="contraste" title="vers&atilde;o em alto contraste">A</a>
        <a href="#" id="contrasteNormal" title="restaurar padr&otilde;es de contraste">A</a>
    </div>
</div>