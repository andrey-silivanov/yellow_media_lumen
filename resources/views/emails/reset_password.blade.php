@extends('emails.layouts.email')

@section('content')

    <div class="u-row-container" style="padding: 0px;background-color: transparent;">
        <div class="u-row"
             style="Margin: 0 auto;min-width: 320px;max-width: 700px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:700px;">
            <tr style=background-color: #ffffff;"><![endif]-->

                <!--[if (mso)|(IE)]>
                <td align="center" width="700"
                    style="width: 700px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"
                    valign="top"><![endif]-->
                <div class="u-col u-col-100"
                     style="max-width: 320px;min-width: 700px;display: table-cell;vertical-align: top;">
                    <div style="width: 100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                            <!--<![endif]-->

                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                   cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td class="v-container-padding-padding"
                                        style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px;font-family:arial,helvetica,sans-serif;"
                                        align="left">

                                        <div class="v-line-height"
                                             style="line-height: 140%; text-align: center; word-wrap: break-word;">
                                            <p style="font-size: 14px; line-height: 140%;"><span
                                                    class="email_text">Token:</span>
                                            </p>
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <table id="u_content_button_3" style="font-family:arial,helvetica,sans-serif;"
                                   role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td class="v-container-padding-padding"
                                        style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px;font-family:arial,helvetica,sans-serif;"
                                        align="left">

                                        <div align="center">
                                            <!--[if mso]>
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                                   style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:arial,helvetica,sans-serif;">
                                                <tr>
                                                    <td style="font-family:arial,helvetica,sans-serif;" align="center">
                                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                                                     xmlns:w="urn:schemas-microsoft-com:office:word"
                                                                     href="https://unlayer.com"
                                                                     style="height:61px; v-text-anchor:middle; width:333px;"
                                                                     arcsize="0%" strokecolor="#000000"
                                                                     strokeweight="3px" fillcolor="#ffffff">
                                                            <w:anchorlock/>
                                                            <center style="font-family:arial,helvetica,sans-serif;">
                                            <![endif]-->
                                            <h3>{{ $token }}</h3>
                                            <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                   cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td class="v-container-padding-padding"
                                        style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px;font-family:arial,helvetica,sans-serif;"
                                        align="left">

                                        <div class="v-line-height"
                                             style="line-height: 140%; text-align: center; word-wrap: break-word;">

                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                   cellspacing="0" width="100%" border="0">
                                <tbody>
                                <tr>
                                    <td class="v-container-padding-padding"
                                        style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 50px;font-family:arial,helvetica,sans-serif;"
                                        align="left">

                                        <div class="v-line-height"
                                             style="line-height: 140%; text-align: center; word-wrap: break-word;">

                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                    </div>
                </div>
                <!--[if (mso)|(IE)]></td><![endif]-->
                <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
            </div>
        </div>
    </div>

@endsection


