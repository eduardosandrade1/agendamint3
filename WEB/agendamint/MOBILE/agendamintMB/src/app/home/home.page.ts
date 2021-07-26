import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { ApiserviceService } from '../apiservice.service';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  user:string;
  senha:string;
  msg:string = "";
  constructor(
    private service:ApiserviceService,
    private route : Router
  ) {}

  login(){

    this.service.doLogin(this.user, this.senha).subscribe((res:any) => {

      const result = res.dados[0];
      console.log(result);
      if(result){
        localStorage.setItem('dados', JSON.stringify(res.dados));
        this.msg = "Redirecionando para sua agenda...";

        setInterval(() => {
          this.route.navigate(['/agenda']);
        }, 2000);

        this.user = "";
        this.senha = "";
        
      }else{
        this.msg = "Usuário ou senha inválida";
      }

    },(error:any) => {

      console.log('ERROR ===', error)

    })
  }
}
