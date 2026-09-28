import { Component } from '@angular/core';
import { TableComponent } from '../table/table.component';
import { ClientService } from '../../servises/client.service';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-client',
  standalone: true,
  imports: [TableComponent , RouterLink],
  templateUrl: './client.component.html',
  styleUrl: './client.component.css',
})
export class ClientComponent {
  data: any = [];
  constructor(private clientServise: ClientService) {
    this.getAllclients();
  }

  getAllclients() {
    this.clientServise.getAllClients().subscribe(
      (response) => {
        console.log(response);
        this.data = response.data;
      },
      (err) => {
        console.log(err);
      }
    );
  }
}
