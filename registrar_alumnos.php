<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "JCMP";

$conn = new mysqli($host, $usuario, $contrasena, $basedatos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$control = $_POST['control'];
$grupo = $_POST['grupo'];
$personas = $_POST['personas'];
$asunto = $_POST['asunto'];
$motivo = $_POST['motivo'];
$fecha = $_POST['fecha'];
$horaEntrada = $_POST['hora_entrada'];
$horaSalida = $_POST['hora_salida'];

$sql = "INSERT INTO alumnos (
  Nombre,
  Numero_Control,
  Area_que_visita,
  Grupo,
  Asunto,
  Motivo,
  Fecha,
  Hora_de_entrada,
  Hora_de_salida
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nombre, $control, $grupo, $personas, $asunto, $motivo, $fecha, $horaEntrada, $horaSalida);

if ($stmt->execute()) {
    echo "<h2>✅ Registro exitoso.</h2>";
    echo "<a href='tutores.html'>Volver al formulario</a>";
} else {
    echo "<h2>❌ Error: " . $stmt->error . "</h2>";
}

$stmt->close();
$conn->close();
?>
