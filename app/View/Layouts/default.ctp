<!doctype html>
<html class="no-js" lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title_for_layout; ?> </title>
    <?= $this->Html->css('foundation'); ?>
    <?= $this->Html->script('modernizr'); ?>
  </head>
  <body>
  	<nav class="top-bar" data-topbar>
    		<ul class='title-area'>
    			<li class='name'>
    				<h1>
              <a href="<?= $this->Html->url(array('controller' => 'vinyls', 'action' => 'index')); ?>">
                MyVnl
              </a>
            </h1>
    			</li>
    			<section class="top-bar-section">
            <ul class="left">
            <?php if (AuthComponent::user('id')) : ?>
              <li>
                <a href="<?= $this->Html->url(array('controller' => 'vinyls','action' => 'add')); ?>">
                Ajouter un vnl
                </a>
              </li>
              <?php endif; ?>
            </ul>
             <ul class="right">
              <?php if (AuthComponent::user('id')) : ?>
              <li>
                <?= $this->Html->link('Se déconnecter', array('controller'=>'users', 'action' => 'logout')); ?>
              </li>
              <li>
                <a href="<?= $this->Html->url(array('controller'=>'users', 'action' => 'profil')); ?>">
                <?= AuthComponent::User('username') ?>
                </a>
              </li>
              <?php else : ?>
                <li>
                  <?= $this->Html->link('Se connecter', array('controller'=>'users', 'action' => 'login')); ?>
                </li>
                <li>
                <a href="<?= $this->Html->url(array('controller'=>'users', 'action' => 'signup')); ?>">
                S'inscrire
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </section>
              
            
    		</ul>
    	</nav>
    <div class="row">
      <?= $this->Session->flash(); ?>
      <?= $this->fetch('content'); ?>
    </div>
    <?= $this->Html->script('jquery'); ?>
    <?= $this->Html->script('main'); ?>
    <?= $this->Html->script('foundation.min'); ?>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
