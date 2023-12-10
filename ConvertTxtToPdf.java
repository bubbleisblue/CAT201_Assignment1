import com.itextpdf.text.Document;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.pdf.PdfWriter;

import java.awt.Desktop;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.FileOutputStream;

public class ConvertTxtToPdf {
    public static void main(String[] args) {
        try {
            // Specify the full path to the text file on your laptop
            String txtFilePath = args[0];

            // Get the file name without the extension
            String fileNameWithoutExtension = getFileNameWithoutExtension(txtFilePath);

            // Get directory of file
            String fileDir = System.getProperty("user.dir");

            // Replace \ to / for later
            fileDir = fileDir.replace('\\', '/');

            // Specify the output PDF file name with the same name as the text file
            String pdfFileName = fileDir + "/uploads/" + fileNameWithoutExtension + ".pdf";

            // Create a PDF file
            File pdfFile = new File(pdfFileName);

            // Create a Document object
            Document document = new Document();

            // Create a PdfWriter instance
            PdfWriter.getInstance(document, new FileOutputStream(pdfFile));

            // Open the Document
            document.open();

            // Create a BufferedReader to read the text file
            BufferedReader br = new BufferedReader(new FileReader(txtFilePath));

            String line;
            while ((line = br.readLine()) != null) {
                // Add a new paragraph with the line
                document.add(new Paragraph(line));
            }

            // Close the BufferedReader
            br.close();

            // Close the Document
            document.close();

            // Open the PDF file
            Desktop.getDesktop().open(pdfFile);

        } catch (Exception e) {
            System.out.println("An error occurred: " + e.getMessage());
        }
    }

    // Helper method to get file name without extension
    private static String getFileNameWithoutExtension(String filePath) {
        File file = new File(filePath);
        String fileName = file.getName();
        int pos = fileName.lastIndexOf(".");
        if (pos > 0) {
            return fileName.substring(0, pos);
        } else {
            return fileName;
        }
    }
}
