
<li class="has-dropdown <?php echo $controller == 'academic_group' ? 'active' : ''; ?>">
    <?php echo $this->Html->link('Cuerpos académicos', array('controller' => 'academic_group', 'action' => 'index')); ?>
    <ul class="dropdown">
        <li>
            <?php echo $this->Html->link('Administrar', array('controller' => 'academic_group', 'action' => 'admin')); ?>
        </li>
        <li>
            <?php echo $this->Html->link('Consultar', array('controller' => 'academic_group', 'action' => 'index')); ?>
        </li>
        <li class="has-dropdown">
            <?php echo $this->Html->link('Investigadores', array('controller' => 'user', 'action' => 'index', 'members')); ?>
            <ul class="dropdown">
                <li>
                    <?php echo $this->Html->link('Registrar', array('controller' => 'user', 'action' => 'register')); ?>
                </li>
                <li class="has-dropdown">
                    <?php echo $this->Html->link('Consultar', array('controller' => 'user', 'action' => 'index', 'members')); ?>
                    <ul class="dropdown">
                        <li>
                            <?php echo $this->Html->link('Todos', array('controller' => 'user', 'action' => 'index', 'all'));
                            ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Por Cuerpo Académico', array('controller' => 'academic_group', 'action' => 'index', 'members'));
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li class="<?php echo $controller == 'section' ? 'active' : ''; ?>">
    <?php echo $this->Html->link('Secciones', array('controller' => 'section', 'action' => 'index')); ?>    
</li>
<li class="has-dropdown <?php echo $controller == 'publication' ? 'active' : ''; ?>">
    <?php echo $this->Html->link('Publicaciones', array('controller' => 'publication', 'action' => 'index')); ?>
    <ul class="dropdown">
        <li>
            <?php echo $this->Html->link('Mis Publicaciones', array('controller' => 'publication', 'action' => 'index', 'mine')); ?>
        </li>
        <li>
            <?php echo $this->Html->link('Agregar', array('controller' => 'publication', 'action' => 'register')); ?>
        </li>
    </ul>
</li>