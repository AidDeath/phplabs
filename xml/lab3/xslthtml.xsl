﻿<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:variable name="var" select="2"/>
<!--<xsl:output method="text" encoding="UTF-8" version="1.0"/>-->  <!--Как текст-->
<!--<xsl:output method="xml" encoding="UTF-8" version="1.0"/>--> <!--Как xml-->
<!--По умолчанию - как html, потому, что есть теги <html>-->

<xsl:template match="/">
  <html>
  <body>
    <h2>Учёт сведений о персонале больницы</h2>
    <table border="1">
    <tr bgcolor="#9acd32">
      <th align="left">Администрация</th>
      <th align="left">Мед. персонал</th>
	  <th align="left">Остальные</th>
    </tr>

 <tr>
    <td>
	  <table border="1">
	  <xsl:for-each select="/root/administrators/person">
      <tr>
				<td><h4>ФИО</h4></td>
				<td><xsl:value-of select="name"/></td>
			</tr>
	  		<tr>
				<td><h4>Ср. зарплата</h4></td>
				<td><xsl:value-of select="avg_month_wage"/></td>
			</tr>
			<tr>
				<td><h4>Дней отпуска</h4></td>
          <xsl:choose>
            <xsl:when test="vacation_days &gt; 30">
          				<td bgcolor ="#00ff00">
        					<xsl:value-of select="vacation_days"/>
				          </td>
            </xsl:when>
          <xsl:otherwise>
                  <td>
        					<xsl:value-of select="vacation_days"/>
				          </td>
          </xsl:otherwise>
          </xsl:choose>

			</tr>

		</xsl:for-each>
		
		</table>
	  </td>
    
      <td>
	  <table border="1">
  <xsl:for-each select="/root/medics/person">
	    <xsl:sort select="avg_month_wage"/>
	  		<tr>
				<td><h4>ФИО</h4></td>
				<td><xsl:value-of select="name"/></td>
			</tr>
			<tr>
				<td><h4>Ср. зарплата</h4></td>
      <xsl:if test="avg_month_wage &gt;= 2500">
				     <td><xsl:value-of select="avg_month_wage"/></td>
        </xsl:if>
        <xsl:if test="avg_month_wage &lt;= 2500">
				      <td><xsl:value-of select="avg_month_wage*$var"/></td>
        </xsl:if>
				
			</tr>
			<tr>
				<td><h4>Дней отпуска</h4></td>
				<td><xsl:value-of select="vacation_days"/></td>
			</tr>
	  </xsl:for-each>
	  </table>
	  </td>
   

	<td>
	<table border="1">
	<xsl:for-each select="/root/etc/person">
	    
      <tr>
				<td><h4>ФИО</h4></td>
				<td><xsl:value-of select="name"/></td>
			</tr>
			<tr>
				<td><h4>Ср. зарплата</h4></td>
				<td><xsl:value-of select="avg_month_wage"/></td>
			</tr>
			<tr>
				<td><h4>Дней отпуска</h4></td>
				<td><xsl:value-of select="vacation_days"/></td>
			</tr>
		
		</xsl:for-each>
		</table>
	  </td>
    </tr>
   </table>
  </body>
  </html>
</xsl:template>

<xsl:template match="vacation_days">
        <td bgcolor="ff0000"><xsl:value-of select="/root/etc/person/vacation_days['19']"/></td>
</xsl:template>
</xsl:stylesheet>