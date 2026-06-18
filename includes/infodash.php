<?php 

    $select_ativos = "SELECT * FROM usuario WHERE status = 's'";

        $ativos = $conn->query($select_ativos);

        $row_atv = $ativos->fetch_object();

        $qtd_atv = $ativos->num_rows;

    $registros_dia = "SELECT * FROM registro WHERE DATE (data_ponto) = CURDATE()";

        $reg_dia = $conn->query($registros_dia);

        $row_dia = $reg_dia->fetch_object();

        $qtd_dia = $reg_dia->num_rows;
?>



<div style="margin-top: 40px; display: flex; align-items: center; justify-content: space-between;">
    <div style="background-color: #ffffffff; padding: 10px; border-radius: 10px; width: 48%; height: 200px; display: flex; align-items: flex-start; flex-flow: column nowrap; justify-content: space-evenly; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding-left: 25px;">
        <img src="images/people.png" alt="pessoas" style="background-color: #dadadaff; padding: 10px; border-radius:50%;">
        <h2>Funcionários ativos</h2>
        <p style="font-size: 30px;"><?php echo $qtd_atv; ?></p>
    </div>
    <div style="background-color: #ffffffff; padding: 10px; border-radius: 10px; width: 48%; height: 200px; display: flex; align-items: flex-start; flex-flow: column nowrap; justify-content: space-evenly; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding-left: 25px;">
        <img src="images/time.png" alt="pessoas" style="background-color: #dadadaff; padding: 10px; border-radius:50%;">
        <h2>Número de registros hoje</h2>
        <p style="font-size: 30px;"><?php echo $qtd_dia; ?></p>
    </div>
</div>