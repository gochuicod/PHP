Hi <?php echo ucfirst(htmlspecialchars($_POST['firstname'])), ' ',ucfirst(htmlspecialchars($_POST['lastname'])); ?>.
<!-- ucfirst() - turns first character of a string uppercase -->
<!-- htmlspecialchars() - converts special characters to HTML entities -->

<?php if((int)$_POST['age'] > 21): echo (int)$_POST['age'], ' is' ?> of legal age.
<?php else: echo (int)$_POST['age'], ' is' ?> still underaged.
<?php endif; ?>