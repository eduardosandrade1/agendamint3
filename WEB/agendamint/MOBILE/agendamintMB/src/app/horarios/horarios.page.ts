import { Component, OnInit } from '@angular/core';
import { ApiserviceService } from '../apiservice.service';

@Component({
  selector: 'app-horarios',
  templateUrl: './horarios.page.html',
  styleUrls: ['./horarios.page.scss'],
})
export class HorariosPage implements OnInit {
  idCliente : string = JSON.parse(localStorage.getItem('dados'))[0]['id'];
  horarios : any = [];

  constructor(
    private service : ApiserviceService
  ) { }

  ngOnInit() {
    this.getHorarios();
  }

  getHorarios(){
    this.service.horariosByCliente(this.idCliente).subscribe((res : any ) => {
      this.horarios = (res.dados[0]);
      console.log(this.horarios)
    });
  }
}
