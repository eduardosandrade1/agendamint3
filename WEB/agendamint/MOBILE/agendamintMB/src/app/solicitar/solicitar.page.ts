import { Component, OnInit } from '@angular/core';
import { ApiserviceService } from '../apiservice.service';

@Component({
  selector: 'app-solicitar',
  templateUrl: './solicitar.page.html',
  styleUrls: ['./solicitar.page.scss'],
})
export class SolicitarPage implements OnInit {
  funcionarios: any;
  constructor(
    private service: ApiserviceService
  ) { }

  ngOnInit() {
    this.service.getFuncionariosByCompany("2").subscribe((res:any) => {
      this.funcionarios = res['dados'];
      console.log(this.funcionarios)
    });
  }

}
