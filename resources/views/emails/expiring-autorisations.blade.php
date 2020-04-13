<html>
    <head>
        <style type="text/css">
            .content {
                width: 80%;
                padding-left: 10%;
                padding-right: 10%;
                padding-top: 5%;
                padding-bottom: 5%;
                margin: 0px;
            }

            .container {
                max-width: 800px;
                min-height: 300px;
                font-family: 'helvetica', verdana, arial;
                margin: auto;
            }

            table {
                width: 100%;
                border: 1px solid #dee2e6;
                border-collapse: collapse;
            }

            table th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            table tbody tr {
                background: rgba(0,0,0,.05);
            }

            table td, table th {
                text-align: center;
                padding: .75rem;
                font-size: 16px;
            }

            .bg-light {
                background: #f8f9fa !important;
            }

            .text-center {
                text-align: center;
            }

            .header-text {
                color: #377dff;
                font-size: 30px;
                font-weight: bold;
            }

            .info-text {
                color: #781959;
                font-size: 28px;
                font-weight: bold;
            }

            .py-15 {
                padding-top: 15px;
                padding-bottom: 15px;
            }

            .table-light, .table-light > td, .table-light > th {
                background-color: #fdfdfe;
            }

            a {
                text-decoration: none;
                font-weight: bold;
                text-align: center;
                color: #ffffff !important;
                font-size: 14px;
                line-height: 16px;
                padding: 17px 0px;
                display: block;
                background: #007bff;
                width: 200px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="content bg-light">
            <div class="container">
                <div class="header-text">Ebiller</div>
                <div class="info-text text-center py-15">Expiring Authorisations Reminder</div>
                <div class="py-15">
                    <table>
                        <thead class="table-light">
                            <tr>
                                <th>Type</th>
                                <th>Valid Until</th>
                            </tr>
                        </thead>
                        <tbody class="m-15">
                            @foreach ($expiringAuthorisations as $expiringAuthorisation)
                            <tr>
                                <td
                                  class="lead align-middle"
                                >{{ $types[$expiringAuthorisation->type] }}</td>
                                <td>{{ $expiringAuthorisation -> valid_until -> format('jS F Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <a href="https://ebiller.tk">Update Now</a>
                </div>
            </div>
        </div>
    </body>
</html>
