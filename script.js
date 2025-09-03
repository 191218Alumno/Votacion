// Capturar botones
const botones = [
  { id: "miBtn1", conta: "conta1", institucion: "ITCJ" },
  { id: "miBtn2", conta: "conta2", institucion: "TEC" },
  { id: "miBtn3", conta: "conta3", institucion: "URN" },
  { id: "miBtn4", conta: "conta4", institucion: "UACJ" },
  { id: "miBtn5", conta: "conta5", institucion: "UACH" }
];

// Iterar botones y asignar evento
botones.forEach(boton => {
  const btn = document.getElementById(boton.id);
  const conta = document.getElementById(boton.conta);

  btn.addEventListener("click", () => {
    // Enviar voto al servidor
    fetch("guardar_voto.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ institucion: boton.institucion })
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        conta.textContent = parseInt(conta.textContent) + 1;
        btn.disabled = true;
        btn.textContent = "Votado";
        alert(`Voto registrado: ${boton.institucion}`);
      } else {
        alert(data.message || "Error al votar");
      }
    })
    .catch(err => console.error("Error:", err));
  });
});
