<?php
  /**
   * Registratons-Formular
   * Das Formular wird mithilfe des Formulargenerators erstellt.
   */
  $lblClass = "col-md-2";
  $eltClass = "col-md-4";
  $btnClass = "btn btn-success";
  $form = new Form($GLOBALS['appurl']."/login/doRegistration");
  $button = new ButtonBuilder();
  echo $form->input()->label('Name')->name('name')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('E-Mail')->name('email')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort')->name('password')->type('password')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort Bestätigen')->name('password_bestätigen')->type('password')->lblClass($lblClass)->eltClass($eltClass);
  echo $button->start($lblClass, $eltClass);
  echo $button->label('Sign in')->name('send')->type('submit')->class('btn-success');
  echo $button->end();
  echo $form->end();

  if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "<div class='alert alert-danger'>
            <strong>$error</strong>
          </div>";
  }
?>
