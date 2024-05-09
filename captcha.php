<?php
session_start();

// Función para generar un captcha aleatorio con letras mayúsculas, minúsculas y números
function generateCaptcha($length = 4) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captcha = '';
    $chars_length = strlen($chars);

    for ($i = 0; $i < $length; $i++) {
        $captcha .= $chars[rand(0, $chars_length - 1)];
    }

    return $captcha;
}

// Generar un captcha aleatorio y almacenarlo en la sesión
$captcha = generateCaptcha();
$_SESSION['captcha'] = $captcha;

// Crear una imagen de captcha
$image = imagecreatetruecolor(150, 50);
$bg_color = imagecolorallocate($image, 255, 255, 255); // Color de fondo blanco
$text_color = imagecolorallocate($image, 0, 0, 0); // Color del texto negro
$line_color = imagecolorallocate($image, 128, 128, 128); // Color de las líneas gris

// Rellenar el fondo con color blanco
imagefilledrectangle($image, 0, 0, 149, 49, $bg_color);

// Dibujar líneas en el fondo
for ($i = 0; $i < 10; $i++) {
    imageline($image, 0, rand(0, 49), 149, rand(0, 49), $line_color);
}

// Dibujar el texto en la imagen con una letra más grande
imagestring($image, 7, 40, 10, $captcha, $text_color);

// Mostrar la imagen como un archivo PNG
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>
