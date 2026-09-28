import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { ClientService } from '../../servises/client.service';
@Component({
  selector: 'app-creates',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './creates.component.html',
  styleUrl: './creates.component.css',
})
export class CreatesComponent {
  myForm: FormGroup;
  constructor(private fb: FormBuilder, private clientServise: ClientService) {
    this.myForm = this.fb.group({
      client_name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      phone: ['', Validators.required],
      adress: ['', Validators.required],
      curruancy: ['10', Validators.required],
      taxes: ['14', Validators.required],
      commission: ['20', Validators.required],
    });
  }
  // ngOnInit(): void {
  //   this.cearteClient();
  // }
  onSubmit() {
    if (this.myForm.valid) {
      console.log('Form Submitted', this.myForm.value);
      this.createClient(this.myForm.value); // corrected to createClient
    }
  }

  createClient(data: any) {
    // corrected to createClient
    this.clientServise.createClients(data).subscribe(
      (response) => {
        console.log(this.myForm);
        console.log(response);
      },
      (error) => {
        console.log(error);
      }
    );
  }
}
