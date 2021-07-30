import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { ApiserviceService } from '../apiservice.service';
import { LoadingController } from '@ionic/angular';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  user:string;
  senha:string;
  msg:any = "";
  constructor(
    private service:ApiserviceService,
    private route : Router,
    private loading: LoadingController
  ) {}
    /**
     * Função de loading 
     */
  async presentLoading() {
    const loading = await this.loading.create({
      cssClass: 'my-custom-class',
      message: 'Verificando...',
      duration: 2000
    });
    await loading.present();
    const { role, data } = await loading.onDidDismiss();
    this.login();
    
  }

  login(){
    this.service.doLogin(this.user, this.senha).subscribe((res:any) => {

      const result = res.dados[0];
      console.log(result)
      if(result){
        localStorage.setItem('id', JSON.stringify(result['id']));
        localStorage.setItem('nome', JSON.stringify(result['nome']));
        localStorage.setItem('login', JSON.stringify(result['login']));
        
        this.msg = { 
          success:true, 
          text: "" 
        };
        // redirect
        this.route.navigate(['/agenda']);
        // clear inputs
        this.user = "";
        this.senha = "";
        
      }else{
        this.msg = {
          success: false, 
          text: "Usuário ou senha inválida"
        };
      }

    },(error:any) => {

      console.log('ERROR ===', error)

    })
  }
}
