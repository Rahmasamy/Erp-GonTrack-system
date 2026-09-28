import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { DashboardService } from '../../servises/dashboard.service';

@Component({
  selector: 'app-homepage',
  standalone: true,
  imports: [RouterLink],
  templateUrl: './homepage.component.html',
  styleUrl: './homepage.component.css',
})
export class HomepageComponent {
  data: any = [];
  constructor(private dashboardServise: DashboardService) {
    this.getAlldashboard();
  }

  getAlldashboard() {
    this.dashboardServise.getAlldashboard().subscribe(
      (response) => {
        console.log(response);
        this.data = response;
        console.log(this.data);
        console.log(this.data.length);
      },
      (err) => {
        console.log(err);
      }
    );
  }
}
