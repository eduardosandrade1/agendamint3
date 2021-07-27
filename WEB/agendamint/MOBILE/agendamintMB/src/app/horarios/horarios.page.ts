import { Component, OnInit } from '@angular/core';
import { ApiserviceService } from '../apiservice.service';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-horarios',
  templateUrl: './horarios.page.html',
  styleUrls: ['./horarios.page.scss'],
})
export class HorariosPage implements OnInit {
  idCliente : string = JSON.parse(localStorage.getItem('id'));
  horarios : any = [];
  valorFormatado : any;
  dataMarcada : any;
  horarioMarcado : string;
  constructor(
    private service : ApiserviceService,
    private alerta : AlertController
  ) { }

  ngOnInit() {
    this.getHorarios();
  }

  getHorarios(){
    this.service.horariosByCliente(this.idCliente).subscribe((res : any ) => {
      this.horarios = res.dados[0];
      if(this.horarios){
        this.valorFormatado = parseFloat(res.dados[0].valor_servico)
        this.valorFormatado = this.valorFormatado.toLocaleString('pt-BR', {
          style: 'currency',
          currency: 'BRL',
        });
        this.dataMarcada    = (res.dados[0].data_marcada).split(" ")[0];

        this.dataMarcada    = (this.dataMarcada).split("-");
        this.dataMarcada    =  this.dataMarcada[2] + "/" + this.dataMarcada[1] + "/" + this.dataMarcada[0];

        this.horarioMarcado = (res.dados[0].data_marcada).split(" ")[1];
      }

    });
  }

  showMoreInfos(){
    this.presentAlert('Detalhes do agendamento', "", "Hora: "+this.horarioMarcado)
  }



  async presentAlert(title:string, subtitle:string, msg:string) {
    const alert = await this.alerta.create({
      cssClass: 'my-custom-class',
      header: title,
      subHeader: subtitle,
      message: msg,
      buttons: ['OK']
    });

    await alert.present();
  }

  solicitar(){
    // this.service.solicitarAgendamento()
  }

}
