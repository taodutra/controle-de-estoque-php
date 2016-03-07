<?php
  if( !isset($_GET['id']) ){
    header('Location: /pedidos.php');
  }
  include('inc/header.php');

  $i = get_item( 'Pedido', $_GET['id'] );
?>

    <div class="container-fluid">
      <div class="row">
        
        <div class="col-sm-12 main">
          <h1 class="page-header">Adicionar Pedido</h1>

          <a href="pedidos.php" class="btn btn-default">Ver listagem de Pedidos</a>

          <hr>

          <form action="pedidos-update.php" method="post" class="bs-example bs-example-form">

            <input type="hidden" name="id" id="id" value="<?php echo $i['id']; ?>">

            <?php $clientes = get_itens('Cliente', 'ORDER BY nome ASC'); ?>
            <div class="form-group">
              <label for="pedido-cliente">Cliente</label>
              <select name="pedido-cliente" id="pedido-cliente" class="form-control field_required" data-type="select" data-title="Cliente">
                <option value="">Selecione</option>
                <?php if($clientes): ?>
                <?php foreach($clientes as $c): $selected = ($c['id'] == $i['id_cliente']) ? ' selected' : '' ; ?>
                <option value="<?php echo $c['id'] ; ?>"<?php echo $selected; ?>><?php echo $c['nome'] ; ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>
            
            <?php $produtos = get_itens('Produto', 'ORDER BY nome ASC'); ?>
            <div class="form-group">
              <label for="pedido-produto">Produto</label>
              <select name="pedido-produto" id="pedido-produto" class="form-control field_required" data-type="select" data-title="Produto">
                <option value="">Selecione</option>
                <?php if($produtos): ?>
                <?php foreach($produtos as $p): $selected = ($p['id'] == $i['id_produto']) ? ' selected' : '' ; ?>
                <option value="<?php echo $p['id'] ; ?>"<?php echo $selected; ?>><?php echo $p['nome'] ; ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-default right">Enviar</button>
          </form>
          
        </div>
      </div>
    </div>

<?php include('inc/footer.php'); ?>